<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Halaman Gagal Ditemukan</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="w-dvw min-h-screen flex justify-center items-center">
		<div class="w-[60%]">
			<div class="flex flex-row gap-x-8 items-center">
				<div class="text-yellow-500 text-6xl">404</div>
				<div class="text-lg">
					<p>
						Kami tidak dapat menemukan halaman yang Anda inginkan.
						Untuk sementara Anda dapat kembali ke halaman <a href="<?= APP_URL ?>">awal</a> atau ke <a href="<?= $previous ?>">halaman sebelumnya.</a>
					</p>
					<i>
						<p>(<?= strip_tags($message); ?>)</p>
					</i>
				</div>
			</div>
		</div>
	</div>
</body>

</html>