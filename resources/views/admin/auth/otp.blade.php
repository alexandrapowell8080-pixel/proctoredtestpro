<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enter OTP</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[hsl(var(--muted, #f3f4f6))] min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Enter Security Code</h1>
            <p class="text-sm text-gray-500 mt-1">We sent a 6-digit code to {{ session('auth_email') }}</p>
        </div>

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm text-center">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('admin.login.verify') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <input type="text" name="otp" required maxlength="6" pattern="\d{6}"
                    class="w-full px-4 py-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition-colors text-center text-2xl tracking-[0.5em] font-mono"
                    placeholder="••••••">
                @error('otp')
                <p class="text-red-500 text-xs mt-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-md">
                Verify & Login
            </button>
        </form>
    </div>
</body>

</html>