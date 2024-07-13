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
    pattern = re.compile(r"return\s+view\(['\"]pages\.[a-zA-Z0-9_]*\.index['\"],\s*\['records'\s*=>\s*([a-zA-Z0-9_]*)::paginate\(10\)\]\);")
    
    for file in files:
        file_path = os.path.join(directory, file)
        tempfile_path = file_path + '.temp'
        file_processed = False

        with open(file_path, 'r') as infile, open(tempfile_path, 'w') as outfile:
            for line in infile:
                match = pattern.search(line)
                if match:
                    model = match.group(1)
                    new_line = f"return {model}::paginate(10);\n"
                    outfile.write(new_line)
                    log_message(logfile, f"Replaced in {file_path}: {new_line.strip()}")
                    file_processed = True
                else:
                    outfile.write(line)

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