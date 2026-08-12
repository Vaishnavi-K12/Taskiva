<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-purple-100 flex items-center justify-center p-6">

    <div class="bg-white rounded-2xl shadow-xl p-8">

    <div class="text-center mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Welcome Back
        </h1>

        <p class="text-gray-500 mt-2">
            Sign in to continue to your account
        </p>

    </div>


    @if (session('success'))
        <div class="mb-5 rounded-lg bg-green-50 border border-green-200
                    text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif


    @if ($errors->any())
        <div class="mb-5 rounded-lg bg-red-50 border border-red-200
                    text-red-700 px-4 py-3 text-sm">

            {{ $errors->first() }}

        </div>
    @endif


            <!-- Login Form -->
            <form method="POST" action="/login" class="space-y-5">

                @csrf

                <!-- Email -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-transparent"
                    >

                </div>


                <!-- Password -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-transparent"
                    >

                </div>


                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg
                           font-semibold hover:bg-blue-700
                           transition duration-200"
                >
                    Sign In
                </button>

            </form>


            <!-- Register Link -->
            <p class="text-center text-sm text-gray-500 mt-6">

                Don't have an account?

                <a
                    href="/register"
                    class="text-blue-600 font-semibold hover:underline"
                >
                    Create Account
                </a>

            </p>

        </div>

    </div>

</body>
</html>