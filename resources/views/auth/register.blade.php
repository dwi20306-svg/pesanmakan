<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | NusaEat</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F97316',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-poppins text-gray-800 min-h-screen flex items-center justify-center">

    <!-- REGISTER CARD -->
    <div class="w-full max-w-md bg-white rounded-3xl shadow-[0_20px_40px_rgba(0,0,0,0.08)] p-10">

        <!-- BRAND -->
        <div class="text-center mb-10">
            <h1 class="text-2xl font-semibold">
                Nusa<span class="text-primary">Eat</span>
            </h1>
            <p class="text-sm text-gray-500 mt-2">
                Buat akun baru untuk mulai memesan
            </p>
        </div>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 text-red-600 text-sm rounded-xl px-4 py-3">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="text-sm font-medium text-gray-600">
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Nama lengkap"
                    required
                    class="mt-2 w-full rounded-xl border px-4 py-3 text-sm
                           focus:outline-none focus:ring-2 focus:ring-primary/40">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="email@example.com"
                    required
                    class="mt-2 w-full rounded-xl border px-4 py-3 text-sm
                           focus:outline-none focus:ring-2 focus:ring-primary/40">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required
                    class="mt-2 w-full rounded-xl border px-4 py-3 text-sm
                           focus:outline-none focus:ring-2 focus:ring-primary/40">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">
                    Konfirmasi Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required
                    class="mt-2 w-full rounded-xl border px-4 py-3 text-sm
                           focus:outline-none focus:ring-2 focus:ring-primary/40">
            </div>

            <button
                type="submit"
                class="w-full py-3 rounded-xl
                       bg-primary text-white text-sm font-medium
                       hover:bg-orange-600 transition">
                Daftar
            </button>

        </form>

        <!-- FOOTER -->
        <p class="text-center text-sm text-gray-500 mt-8">
            Sudah punya akun?
            <a href="/login" class="text-primary font-medium hover:underline">
                Login
            </a>
        </p>

    </div>

</body>
</html>
