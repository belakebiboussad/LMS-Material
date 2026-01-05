<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-blue-600">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
      <!-- The button below triggers a modal in a typical setup (e.g., Breeze) -->
    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="">{{ __('Delete Account') }}</x-danger-button>
</section>


<x-modal name="confirm-user-deletion" :show="request()->routeIs('profile.edit')" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('DELETE') <!-- Spoofs the POST request to a DELETE HTTP verb -->
         <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

    </form>
</x-modal>
