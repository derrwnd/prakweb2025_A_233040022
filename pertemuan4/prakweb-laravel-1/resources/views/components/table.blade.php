{{-- Table --}}
<div class="overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Image
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Published At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr class="bg-neutral-primary border-b border-default">
                <td class="px-6 py-4">
                    {{ $posts->firstItem() + $loop->index }}
                </td>
                <td class="px-6 py-4">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-32 h-32 rounded-lg object-cover">
                    @else
                        <img id="preview" class="w-32 h-32 rounded-lg object-cover border border-default bg-gray-100" src="{{ asset('image/preview.jpg') }}" alt="Image preview">
                    @endif
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{ $post->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $post->category->name ?? 'Uncategorized' }}
                </td>
                <td class="px-6 py-4">
                    {{ $post->created_at->format('d M Y') }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.show', $post->slug) }}" class="text-blue-600 hover:underline">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                    No posts yet. <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">Create one</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>



<nav aria-label="Page navigation example">
  <ul class="flex -space-x-px text-sm">
    <li>
      <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-9 focus:outline-none">Previous</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">1</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">2</a>
    </li>
    <li>
      <a href="#" aria-current="page" class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover:text-fg-brand font-medium text-sm w-9 h-9 focus:outline-none">3</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">4</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">5</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-9 focus:outline-none">Next</a>
    </li>
  </ul>
</nav>

{{-- Pagination --}}
@if ($posts->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        <nav aria-label="Page navigation">
            <ul class="flex space-x-2 text-sm">

                {{-- Previous Button --}}
                @if ($posts->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-10">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $posts->previousPageUrl() }}"
                           class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-10 focus:outline-none">
                            Previous
                        </a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if ($page == $posts->currentPage())
                        <li>
                            <a href="{{ $url }}" aria-current="page"
                               class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover:text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                               class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-10 h-10 focus:outline-none">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($posts->hasMorePages())
                    <li>
                        <a href="{{ $posts->nextPageUrl() }}"
                           class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-10 focus:outline-none">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-10">
                            Next
                        </span>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
@endif