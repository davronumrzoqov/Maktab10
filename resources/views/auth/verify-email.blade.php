<x-guest-layout>
    <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Please verify your email address by clicking the link we emailed you.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row items-center justify-between gap-3">

        <!-- Resend Verification Email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>

    </div>
</x-guest-layout>
