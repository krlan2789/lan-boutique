<div class="flex-1 h-auto min-h-screen px-6 pt-16 custom-scrollable-y bg-tertiary/85">
    <div class="pt-16 text-center">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-12 sm:h-14" src="/img/logo/Logo_only_wb.webp" alt="">
        </div>

        <p class="mt-8 text-primary dark:text-quaternary">Registration Form</p>
    </div>

    <div class="pt-6 pb-16" x-data="{ password: '', verifyPassword: '' }">
        <form action="/register" method="POST">
            @csrf
            <div class="mt-8 mb-4">
                <h2 class="text-2xl font-medium text-primary">Personal Information</h2>
                <div class="h-px mt-4 bg-primary"></div>
            </div>

            <div class="mt-4">
                <label for="name" class="block mb-4 text-sm text-primary dark:text-quaternary">
                    Your Name
                </label>
                <input type="name" name="name" id="name" placeholder="Your Name" class="w-full input-main"
                    value="{{ old('name') }}" required />
                @error('name')
                    <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="email" class="block mb-4 text-sm text-primary dark:text-quaternary">Gender</label>
                <label class="relative flex items-center w-full cursor-pointer">
                    <input type="checkbox" name="isMale" value="true" checked class="sr-only peer" />
                    <div class="w-full peer toggle-switch">
                        <span class="w-1/2 text-center">Female</span>
                        <span class="w-1/2 text-center">Male</span>
                    </div>
                </label>
            </div>

            <div class="mt-8 mb-4">
                <h2 class="text-2xl font-medium text-primary">Login Information</h2>
                <div class="h-px mt-4 bg-primary"></div>
            </div>

            <div class="mt-4">
                <label for="email" class="block mb-4 text-sm text-primary dark:text-quaternary">Email
                    Address</label>
                <input type="email" name="email" id="email" placeholder="example@example.com"
                    value="{{ old('email') }}" class="w-full input-main" required />
                @error('email')
                    <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="block mb-4 text-sm text-primary dark:text-quaternary">Password</label>
                <input type="password" name="password" id="password" placeholder="Your Password"
                    class="w-full input-main" required x-model="password" />
                @error('password')
                    <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="verify-password" class="block mb-4 text-sm text-primary dark:text-quaternary">Verify
                    Password</label>
                <input type="password" name="verifyPassword" id="verify-password" placeholder="Verify Password"
                    class="w-full input-main" required x-model="verifyPassword" />

                <div x-show="verifyPassword.length > 0 && password != verifyPassword" class="text-sm text-danger">
                    Please retype your password
                </div>
            </div>

            <div class="mt-4">
                <p class="text-xs text-center">By clicking 'Register' button, you agree to our <a href="/term-of-use"
                        class="simple-link" target="_blank">Term of Use</a> and <a href="/privacy-policy"
                        class="simple-link" target="_blank">Privacy Policy</a>.</p>
            </div>

            <div class="mt-4">
                <button type="submit" class="w-full btn-main">
                    Register
                </button>
            </div>

        </form>

        <p class="mt-6 text-sm text-center text-primary">Already have an account? <a href="/login"
                class="simple-link">Login</a>.
        </p>
    </div>
</div>
