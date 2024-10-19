<div class="flex flex-col justify-center flex-1 min-h-screen px-6 pt-16 align-middle custom-scrollable bg-tertiary/85">
    <div class="w-full pt-16 text-center">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-12 sm:h-14" src="/img/logo/Logo_only_wb.webp" alt="">
        </div>

        <p class="mt-8 text-primary dark:text-quaternary">Access your account</p>
    </div>

    <div class="w-full pt-6 pb-16">
        <form action="/login" method="POST">
            @csrf
            <div class="mt-8 mb-4">
                <h2 class="text-2xl font-medium text-primary">Login Information</h2>
                <div class="h-px mt-4 bg-primary"></div>
            </div>

            <div class="mt-4">
                <label for="email" class="block mb-2 text-sm text-primary dark:text-quaternary">Email
                    Address</label>
                <input type="email" name="email" id="email" placeholder="example@example.com"
                    class="w-full input-main" />
            </div>

            <div class="mt-6">
                <div class="flex justify-between mb-2">
                    <label for="password" class="text-sm text-primary dark:text-quaternary">Password</label>
                    <a href="/forgot-password"
                        class="text-sm text-primary focus:text-primary hover:text-primary hover:underline">Forgot
                        password?</a>
                </div>

                <input type="password" name="password" id="password" placeholder="Your Password"
                    class="w-full input-main" />
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full btn-main">
                    Login
                </button>
            </div>

        </form>

        <p class="mt-6 text-sm text-center text-primary">Don&#x27;t have an account yet? <a href="/register"
                class="simple-link">Register</a>.
        </p>
    </div>
</div>
