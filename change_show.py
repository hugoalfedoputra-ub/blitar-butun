import os
import re
import shutil
import datetime

def get_directory():
    directory = input("Enter the path to your controllers directory: ")
    if not os.path.exists(directory):
        print("The specified directory does not exist.")
        exit()
    return directory

def confirm_directory(directory):
    print(f"You have entered: {directory}")
    confirm = input("Are you sure you want to proceed with these changes? (y/n): ")
    if confirm.lower() != 'y':
        print("Operation canceled.")
        exit()

def log_message(logfile, message):
    with open(logfile, 'a') as log:
        log.write(message + '\n')
    print(message)

def process_files(directory):
    logfile = 'replace_log.txt'
    with open(logfile, 'w') as log:
        log.write(f"Replacement Log - {datetime.datetime.now()}\n")
        log.write(f"Directory: {directory}\n")
        log.write("=" * 30 + "\n")

    files = [f for f in os.listdir(directory) if f.endswith("Controller.php")]

    if not files:
        print("No controller files found in the specified directory.")
        exit()

    total_files = len(files)
    print(f"Total Files: {total_files}")
    input("Press Enter to continue...")

    processed_files = 0
    pattern = re.compile(r"""public\s+function\s+show\s*\([^)]*\)\s*
    \s*{\s*
        return\s+view\s*\([^)]*\)\s*;\s*
    \s*}""", re.MULTILINE | re.DOTALL)
    
    for file in files:
        file_path = os.path.join(directory, file)
        tempfile_path = file_path + '.temp'
        file_processed = False

        with open(file_path, 'r') as infile, open(tempfile_path, 'w') as outfile:
            content = infile.read()
            matches = pattern.finditer(content)
            last_end = 0
            for match in matches:
                outfile.write(content[last_end:match.start()])
                # Extract model name from file name (assuming it follows the convention)
                model_name = file.replace('Controller.php', '')
                variable_name = model_name.lower()
                new_method = f"""public function show(string $id)
    {{
        ${variable_name} = {model_name}::find($id);
        if (${variable_name}) {{
            return response()->json(${variable_name});
        }}
        return response()->json(['message' => '{model_name} not found'], 404);
    }}"""
                outfile.write(new_method)
                last_end = match.end()
                log_message(logfile, f"Replaced show() method in {file_path}")
                file_processed = True
            outfile.write(content[last_end:])

        if file_processed:
            shutil.move(tempfile_path, file_path)
            processed_files += 1
            log_message(logfile, f"Processed {file_path} ({processed_files} of {total_files})")
        else:
            os.remove(tempfile_path)  # Clean up the temporary file if no replacements were made

    log_message(logfile, "=" * 30)
    log_message(logfile, f"Replacement complete. Processed {processed_files} files.")
    input("Press Enter to exit...")

if __name__ == "__main__":
    directory = get_directory()
    confirm_directory(directory)
    process_files(directory)