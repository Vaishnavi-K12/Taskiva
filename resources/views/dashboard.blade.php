<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TaskFlow Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        primaryDark: '#4338CA',
                    }
                }
            }
        }
    </script>
</head>


<body class="bg-slate-50 min-h-screen">


    <!-- ================= NAVBAR ================= -->

    <nav class="bg-indigo-600 text-white shadow-lg">

        <div class="max-w-7xl mx-auto px-6 py-4
                    flex items-center justify-between">


            <!-- Logo -->

            <div class="flex items-center gap-3">

                <div class="w-10 h-10
                            bg-white
                            rounded-xl
                            flex items-center justify-center
                            shadow-sm">

                    <span class="text-indigo-600
                                 font-bold text-xl">
                        ✓
                    </span>

                </div>

                <div>

                    <h1 class="text-xl font-bold tracking-wide">
                        TaskFlow
                    </h1>

                    <p class="text-xs text-indigo-200">
                        Stay organized. Stay productive.
                    </p>

                </div>

            </div>


            <!-- User Area -->

            <div class="flex items-center gap-5">


                <div class="hidden sm:block text-right">

                    <p class="text-sm text-indigo-100">
                        Welcome back,
                    </p>

                    <p class="font-semibold">
                        {{ auth()->user()->name }}
                    </p>

                </div>


                <!-- Profile -->

                <a href="{{ route('profile') }}"
   class="w-11 h-11
          bg-white
          rounded-full
          flex items-center
          justify-center
          shadow-sm
          hover:bg-indigo-50
          transition">

    <span class="text-indigo-600 font-bold">

        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

    </span>

</a>


                <!-- Logout -->

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2
                               rounded-lg
                               border border-indigo-400
                               hover:bg-indigo-700
                               transition
                               text-sm
                               font-medium">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </nav>



    <!-- ================= MAIN ================= -->

    <main class="max-w-6xl mx-auto px-6 py-10">


        <!-- Heading -->

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-slate-800">

                My Tasks

            </h2>

            <p class="text-slate-500 mt-2">

                Organize your tasks and stay on top of your work.

            </p>

        </div>



        <!-- ================= MESSAGES ================= -->

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



        <!-- ================= STATISTICS ================= -->

        <div class="grid grid-cols-1
                    md:grid-cols-3
                    gap-6
                    mb-8">


            <!-- Total -->

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-6
                        hover:shadow-md
                        transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Tasks
                        </p>

                        <p class="text-3xl font-bold
                                  text-indigo-600 mt-2">
                            {{ $totalTasks }}
                        </p>

                    </div>


                    <div class="w-12 h-12
                                bg-indigo-50
                                rounded-xl
                                flex items-center justify-center">

                        <span class="text-indigo-600 text-xl">
                            ✓
                        </span>

                    </div>

                </div>

            </div>



            <!-- Completed -->

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-6
                        hover:shadow-md
                        transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Completed
                        </p>

                        <p class="text-3xl font-bold
                                  text-emerald-600 mt-2">
                            {{ $completedTasks }}
                        </p>

                    </div>


                    <div class="w-12 h-12
                                bg-emerald-50
                                rounded-xl
                                flex items-center justify-center">

                        <span class="text-emerald-600 text-xl">
                            ✓
                        </span>

                    </div>

                </div>

            </div>



            <!-- Pending -->

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-6
                        hover:shadow-md
                        transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Pending
                        </p>

                        <p class="text-3xl font-bold
                                  text-amber-500 mt-2">
                            {{ $pendingTasks }}
                        </p>

                    </div>


                    <div class="w-12 h-12
                                bg-amber-50
                                rounded-xl
                                flex items-center justify-center">

                        <span class="text-amber-500 text-xl">
                            !
                        </span>

                    </div>

                </div>

            </div>

        </div>



        <!-- ================= ADD TASK ================= -->

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    p-8
                    mb-8">


            <div class="mb-7">

                <h3 class="text-xl font-bold text-slate-800">

                    Add New Task

                </h3>

                <p class="text-sm text-slate-500 mt-1">

                    Create a task and keep your work organized.

                </p>

            </div>



            <form method="POST"
                  action="{{ route('tasks.store') }}">

                @csrf


                <!-- Task Name -->

                <div class="mb-5">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        Task Name

                    </label>

                    <input
                        type="text"
                        name="task_name"
                        value="{{ old('task_name') }}"
                        placeholder="Enter task name"

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               focus:border-indigo-500
                               outline-none
                               transition">

                </div>



                <!-- Description -->

                <div class="mb-5">

                    <label class="block
                                  text-sm
                                  font-medium
                                  text-slate-700
                                  mb-2">

                        Description

                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Describe your task..."

                        class="w-full
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-indigo-500
                               focus:border-indigo-500
                               outline-none
                               transition">{{ old('description') }}</textarea>

                </div>



                <!-- Date + Priority -->

                <div class="grid grid-cols-1
                            md:grid-cols-2
                            gap-5">


                    <!-- Due Date -->

                    <div>

                        <label class="block
                                      text-sm
                                      font-medium
                                      text-slate-700
                                      mb-2">

                            Due Date

                        </label>

                        <input
                            type="date"
                            name="due_date"
                            value="{{ old('due_date') }}"

                            class="w-full
                                   px-4 py-3
                                   rounded-xl
                                   border border-slate-300
                                   bg-slate-50
                                   focus:bg-white
                                   focus:ring-2
                                   focus:ring-indigo-500
                                   focus:border-indigo-500
                                   outline-none
                                   transition">

                    </div>



                    <!-- Priority -->

                    <div>

                        <label class="block
                                      text-sm
                                      font-medium
                                      text-slate-700
                                      mb-2">

                            Priority

                        </label>

                        <select
                            name="priority"

                            class="w-full
                                   px-4 py-3
                                   rounded-xl
                                   border border-slate-300
                                   bg-slate-50
                                   focus:bg-white
                                   focus:ring-2
                                   focus:ring-indigo-500
                                   focus:border-indigo-500
                                   outline-none
                                   transition">

                            <option value="Low">
                                Low
                            </option>

                            <option value="Medium" selected>
                                Medium
                            </option>

                            <option value="High">
                                High
                            </option>

                        </select>

                    </div>

                </div>



                <!-- Add Button -->

                <div class="mt-7">

                    <button
                        type="submit"

                        class="bg-indigo-600
                               hover:bg-indigo-700
                               text-white
                               font-semibold
                               px-7 py-3
                               rounded-xl
                               shadow-sm
                               hover:shadow-md
                               transition">

                        + Add Task

                    </button>

                </div>

            </form>

        </div>



        <!-- ================= SEARCH TASKS ================= -->

<div class="bg-white
            rounded-2xl
            border border-slate-200
            shadow-sm
            p-8
            mb-8">

    <div class="mb-6">

        <h3 class="text-xl font-bold text-slate-800">
            Search Tasks
        </h3>

        <p class="text-sm text-slate-500 mt-1">
            Search and filter your tasks.
        </p>

    </div>


    <form method="GET" action="{{ route('dashboard') }}">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">


            <!-- Search -->

            <div>

                <label class="block
                              text-sm
                              font-medium
                              text-slate-700
                              mb-2">

                    Task Name

                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search task..."

                    class="w-full
                           px-4 py-3
                           rounded-xl
                           border border-slate-300
                           bg-slate-50
                           focus:bg-white
                           focus:ring-2
                           focus:ring-indigo-500
                           focus:border-indigo-500
                           outline-none
                           transition">

            </div>


            <!-- Priority -->

            <div>

                <label class="block
                              text-sm
                              font-medium
                              text-slate-700
                              mb-2">

                    Priority

                </label>

                <select
                    name="priority"

                    class="w-full
                           px-4 py-3
                           rounded-xl
                           border border-slate-300
                           bg-slate-50
                           focus:bg-white
                           focus:ring-2
                           focus:ring-indigo-500
                           focus:border-indigo-500
                           outline-none">

                    <option value="">
                        All Priorities
                    </option>

                    <option value="Low"
                        {{ request('priority') == 'Low' ? 'selected' : '' }}>
                        Low
                    </option>

                    <option value="Medium"
                        {{ request('priority') == 'Medium' ? 'selected' : '' }}>
                        Medium
                    </option>

                    <option value="High"
                        {{ request('priority') == 'High' ? 'selected' : '' }}>
                        High
                    </option>

                </select>

            </div>


            <!-- Due Date -->

            <div>

                <label class="block
                              text-sm
                              font-medium
                              text-slate-700
                              mb-2">

                    Due Date

                </label>

                <input
                    type="date"
                    name="due_date"
                    value="{{ request('due_date') }}"

                    class="w-full
                           px-4 py-3
                           rounded-xl
                           border border-slate-300
                           bg-slate-50
                           focus:bg-white
                           focus:ring-2
                           focus:ring-indigo-500
                           focus:border-indigo-500
                           outline-none">

            </div>


            <!-- Status -->

            <div>

                <label class="block
                              text-sm
                              font-medium
                              text-slate-700
                              mb-2">

                    Status

                </label>

                <select
                    name="status"

                    class="w-full
                           px-4 py-3
                           rounded-xl
                           border border-slate-300
                           bg-slate-50
                           focus:bg-white
                           focus:ring-2
                           focus:ring-indigo-500
                           focus:border-indigo-500
                           outline-none">

                    <option value="">
                        All Status
                    </option>

                    <option value="Pending"
                        {{ request('status') == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ request('status') == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

            </div>

        </div>


        <!-- Buttons -->

        <div class="flex gap-3 mt-6">

            <button
                type="submit"

                class="bg-indigo-600
                       hover:bg-indigo-700
                       text-white
                       font-semibold
                       px-6 py-3
                       rounded-xl
                       transition">

                🔎 Search

            </button>


            <a
                href="{{ route('dashboard') }}"

                class="bg-slate-100
                       hover:bg-slate-200
                       text-slate-700
                       font-semibold
                       px-6 py-3
                       rounded-xl
                       transition">

                Clear

            </a>

        </div>

    </form>

</div>
        <!-- ================= TASK LIST ================= -->

<div class="mt-8">

    <div class="flex items-center justify-between mb-5">

        <div>
            <div>
    <h3 class="text-xl font-bold text-slate-800">
        My Tasks
    </h3>

    @if(request()->hasAny(['search', 'priority', 'due_date', 'status']))

        <p class="text-sm text-indigo-600 mt-1">
            Showing filtered results
        </p>

    @endif
</div>

            <p class="text-sm text-slate-500 mt-1">
                Your recently created tasks.
            </p>
        </div>

    </div>


    @if($tasks->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach($tasks as $task)

                <div class="bg-white
                            rounded-2xl
                            border border-slate-200
                            shadow-sm
                            p-6
                            hover:shadow-md
                            transition">

                    <!-- Task Header -->

                    <div class="flex items-start justify-between gap-4">

                        <h4 class="text-lg font-bold text-slate-800">
                            {{ $task->task_name }}
                        </h4>


                        <!-- Priority -->

                        @if($task->priority === 'High')

                            <span class="px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-rose-50
                                         text-rose-600">

                                High

                            </span>

                        @elseif($task->priority === 'Medium')

                            <span class="px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-amber-50
                                         text-amber-600">

                                Medium

                            </span>

                        @else

                            <span class="px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-indigo-50
                                         text-indigo-600">

                                Low

                            </span>

                        @endif

                    </div>


                    <!-- Description -->

                    <p class="text-slate-500
                              text-sm
                              mt-3
                              min-h-[40px]">

                        {{ $task->description ?: 'No description provided.' }}

                    </p>


                    <!-- Due Date -->

                    <div class="mt-5
                                flex items-center
                                text-sm text-slate-500">

                        <span class="font-medium text-slate-700">
                            Due:
                        </span>

                        <span class="ml-2">
                            {{ $task->due_date->format('d M Y') }}
                        </span>

                    </div>


                    <!-- Status -->

                    <div class="mt-3">

                        @if($task->status === 'Completed')

                            <span class="inline-flex
                                         items-center
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-emerald-50
                                         text-emerald-600">

                                ✓ Completed

                            </span>

                        @else

                            <span class="inline-flex
                                         items-center
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-amber-50
                                         text-amber-600">

                                ● Pending

                            </span>

                        @endif

                    </div>


                    <!-- Actions -->

                    <div class="mt-6
                                pt-4
                                border-t border-slate-100
                                flex gap-3">

                        <form method="POST"
      action="{{ route('tasks.status', $task->id) }}"
      class="flex-1">

    @csrf

    @method('PATCH')

    <button
        type="submit"
        class="w-full
               bg-emerald-50
               hover:bg-emerald-100
               text-emerald-700
               font-medium
               py-2
               rounded-lg
               text-sm
               transition">

        @if($task->status === 'Pending')
            Mark Completed
        @else
            Mark Pending
        @endif

    </button>

</form>


                        <<form method="POST"
      action="{{ route('tasks.destroy', $task->id) }}">

    @csrf

    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm('Are you sure you want to delete this task?')"

        class="px-4
               bg-rose-50
               hover:bg-rose-100
               text-rose-600
               font-medium
               py-2
               rounded-lg
               text-sm
               transition">

        Delete

    </button>

</form>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <!-- Empty State -->

        <div class="bg-white
                    border border-slate-200
                    rounded-2xl
                    p-10
                    text-center">

            <div class="w-16 h-16
                        mx-auto
                        bg-indigo-50
                        rounded-2xl
                        flex items-center justify-center">

                <span class="text-2xl text-indigo-600">
                    ✓
                </span>

            </div>

            <h4 class="mt-5
                       text-lg
                       font-semibold
                       text-slate-800">

                No tasks yet

            </h4>

            <p class="text-sm text-slate-500 mt-2">

                Add your first task above and start organizing your work.

            </p>

        </div>

    @endif

</div>

    </main>

</body>

</html>