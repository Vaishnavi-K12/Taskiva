<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-purple-100 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-xl p-8">

            <!-- Heading -->
            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold text-gray-800">
                    Create Account
                </h1>

                <p class="text-gray-500 mt-2">
                    Create your account to get started
                </p>

            </div>


            <!-- Register Form -->
            <form method="POST" action="/register" class="space-y-5">

                @csrf

                <!-- Name -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Enter your name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-transparent"
                    >

                </div>


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


                <!-- Confirm Password -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-transparent"
                    >

                </div>


                <!-- Register Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg
                           font-semibold hover:bg-blue-700
                           transition duration-200"
                >
                    Create Account
                </button>

            </form>


            <!-- Login Link -->
            <p class="text-center text-sm text-gray-500 mt-6">

                Already have an account?

                <a
                    href="/login"
                    class="text-blue-600 font-semibold hover:underline"
                >
                    Sign In
                </a>

            </p>

        </div>

    </div>

</body>
</html>