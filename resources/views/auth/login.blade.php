<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Welcome Back</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if ($errors->has('login'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                {{ $errors->first('login') }}
            </div>
            @endif
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-6 flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2">Remember Me</span>
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow">
                Login
            </button>
        </form>

        <p class="text-sm text-center text-gray-600 mt-6">
            Don’t have an account? <a href="{{route('signUpView')}}" class="text-blue-600 hover:underline">Sign up</a>
        </p>
    </div>
</body>

</html>