<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'NusaEat' }}</title>

    <!-- Tailwind tanpa npm (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                },
            },
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-6">
            <h1 class="text-2xl font-bold mb-6">NusaEat</h1>
            <nav>
                <ul class="space-y-4 text-[15px]">
                    <li><a href="#" class="text-orange-500 font-semibold">🏠 Dashboard</a></li>
                    <li><a href="/profil">👤 Profil Saya</a></li>
                    <li><a href="/Order Menu">🧾 Order Menu</a></li>
                    <li><a href="#">🍴 Menu</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
