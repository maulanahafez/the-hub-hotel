<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Hub Hotel</title>

    <!-- Style -->
    @vite('resources/css/main.css')

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Family -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="font-open-sans">
    <div class="flex h-screen md:grid md:grid-cols-2">
        <div class="m-auto w-auto sm:w-96">
            <div>
                <div>
                    <div class="text-center font-poppins text-xl">HUBHOTEL</div>
                    <h1 class="mt-4 font-poppins text-3xl font-bold">
                        Creating new account
                    </h1>
                    <p class="mt-2 text-lg text-black/60">
                        Fill the information below to create new account
                    </p>
                </div>

                {{-- Form Signup --}}
                <form method="POST" action="{{ route('signup') }}" class="mt-6">
                    @csrf
                    <div>
                        <input type="text" name="name" id="name" placeholder="Full Name" autofocus
                            class="w-full rounded-lg border border-sky-950 px-3 py-2 text-sm focus:outline-sky-500 @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required />
                        @error('name')
                            <div class="text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="email" name="email" id="email" placeholder="Email Address" autofocus
                            class="w-full rounded-lg border border-sky-950 px-3 py-2 text-sm focus:outline-sky-500 @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required />
                        @error('email')
                            <div class="text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="w-full rounded-lg border border-sky-950 px-3 py-2 text-sm focus:outline-sky-500 @error('password') is-invalid @enderror"
                            required>
                        @error('password')
                            <div class="text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="password" name="password_confirmation" id="password"
                            placeholder="Password Confirmation"
                            class="w-full rounded-lg border border-sky-950 px-3 py-2 text-sm focus:outline-sky-500 @error('password_confirmation') is-invalid @enderror"
                            required />
                        @error('password_confirmation')
                            <div class="text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full rounded-lg bg-sky-500 px-3 py-2 text-sm text-white transition hover:bg-sky-950">
                            Sign Up
                        </button>
                    </div>
                    <div class="mt-4 text-sm text-black/60">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-sky-500 transition hover:text-sky-950">Log In</a>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <img src="{{ asset('/images/hero.jpg') }}" alt="" class="hidden h-screen object-cover md:block" />
        </div>
    </div>

    <!-- Responsive Helper -->
    <div class="fixed bottom-20 right-0 h-12 w-12 bg-blue-200 sm:bg-red-200 md:bg-green-200 lg:bg-yellow-200"></div>
</body>

</html>
