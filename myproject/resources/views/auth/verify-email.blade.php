<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Paldies par reģistrāciju! Lai turpinātu, lūdzu apstipriniet savu e-pasta adresi, noklikšķinot uz saites, kuru nosūtījām uz jūsu e-pastu.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm text-green-600">
            Jauna apstiprinājuma saite ir nosūtīta uz jūsu e-pastu.
        </div>
    @endif

    <div class="mt-4 flex justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                Nosūtīt vēlreiz
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600">
                Izlogoties
            </button>
        </form>
    </div>
</x-guest-layout>
