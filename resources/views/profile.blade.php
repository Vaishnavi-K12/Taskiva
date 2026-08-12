<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TaskFlow - Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-slate-50 min-h-screen">


    <!-- Navbar -->

    <nav class="bg-indigo-600 text-white shadow-lg">

        <div class="max-w-6xl mx-auto px-6 py-4
                    flex items-center justify-between">


            <!-- Logo -->

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3">

                <div class="w-10 h-10
                            bg-white
                            rounded-xl
                            flex items-center
                            justify-center">

                    <span class="text-indigo-600
                                 font-bold text-xl">

                        ✓

                    </span>

                </div>


                <div>

                    <h1 class="text-xl font-bold">
                        TaskFlow
                    </h1>

                    <p class="text-xs text-indigo-200">
                        Your Profile
                    </p>

                </div>

            </a>


            <!-- Back -->

            <a href="{{ route('dashboard') }}"
               class="text-sm
                      bg-indigo-700
                      hover:bg-indigo-800
                      px-4 py-2
                      rounded-lg
                      transition">

                ← Dashboard

            </a>

        </div>

    </nav>



    <!-- Main -->

    <main class="max-w-3xl mx-auto px-6 py-10">


        <!-- Heading -->

        <div class="mb-8">

            <h2 class="text-3xl
                       font-bold
                       text-slate-800">

                My Profile

            </h2>

            <p class="text-slate-500 mt-2">

                Manage your personal information and password.

            </p>

        </div>



        <!-- Success -->

        @if(session('success'))

            <div class="mb-6
                        bg-emerald-50
                        border border-emerald-200
                        text-emerald-700
                        px-5 py-3
                        rounded-xl">

                {{ session('success') }}

            </div>

        @endif



        <!-- Errors -->

        @if($errors->any())

            <div class="mb-6
                        bg-rose-50
                        border border-rose-200
                        text-rose-700
                        px-5 py-3
                        rounded-xl">

                <ul class="list-disc list-inside">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- Profile Information -->

        <div class="bg-white
                    border border-slate-200
                    rounded-2xl
                    shadow-sm
                    p-8
                    mb-8">


            <div class="flex items-center gap-4 mb-7">


                <!-- Avatar -->

                <div class="w-16 h-16
                            rounded-full
                            bg-indigo-100
                            flex items-center
                            justify-center">

                    <span class="text-2xl
                                 font-bold
                                 text-indigo-600">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </span>

                </div>


                <div>

                    <h3 class="text-xl
                               font-bold
                               text-slate-800">

                        Profile Information

                    </h3>

                    <p class="text-sm text-slate-500">

                        Update your account information.

                    </p>

                </div>

            </div>



            <!-- Update Profile -->

            <form method="POST"
                  action="{{ route('profile.update') }}">

                @csrf

                @method('PUT')


                <!-- Name -->

                <div class="mb-5">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ auth()->user()->name }}"

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               outline-none">

                </div>



                <!-- Email -->

                <div class="mb-6">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        Email Address

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ auth()->user()->email }}"

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               outline-none">

                </div>



                <button
                    type="submit"

                    class="bg-indigo-600
                           hover:bg-indigo-700
                           text-white
                           font-semibold
                           px-6 py-3
                           rounded-xl
                           transition">

                    Save Changes

                </button>

            </form>

        </div>



        <!-- Change Password -->

        <div class="bg-white
                    border border-slate-200
                    rounded-2xl
                    shadow-sm
                    p-8">


            <div class="mb-7">

                <h3 class="text-xl
                           font-bold
                           text-slate-800">

                    Change Password

                </h3>

                <p class="text-sm text-slate-500 mt-1">

                    Keep your account secure with a strong password.

                </p>

            </div>



            <form method="POST"
                  action="{{ route('profile.password') }}">

                @csrf

                @method('PUT')


                <!-- Current Password -->

                <div class="mb-5">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        Current Password

                    </label>

                    <input
                        type="password"
                        name="current_password"
                        placeholder="Enter current password"

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               outline-none">

                </div>



                <!-- New Password -->

                <div class="mb-5">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        New Password

                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter new password"

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               outline-none">

                </div>



                <!-- Confirm Password -->

                <div class="mb-6">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        Confirm New Password

                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm new password"

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               outline-none">

                </div>



                <button
                    type="submit"

                    class="bg-slate-800
                           hover:bg-slate-900
                           text-white
                           font-semibold
                           px-6 py-3
                           rounded-xl
                           transition">

                    Change Password

                </button>

            </form>

        </div>

    </main>

</body>

</html>