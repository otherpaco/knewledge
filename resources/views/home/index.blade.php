<x-guest-layout>
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    @forelse ($documents as $document)
                        <li>{{ $document->title }}</li>
                    @empty
                        <li>No recent documents in database</li>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
