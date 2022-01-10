<form method="GET" action="{{ route('post.index') }}">
    <label for="search-input" class="sr-only">
        Search
    </label>
    <input
        id="search-input"
        class="dark:bg-black dark:text-white bg-white text-black focus:outline-none focus:shadow border border-purple-500 rounded py-2 px-2 block w-full appearance-none leading-none"
        type="search"
        name="q"
        placeholder="Search"
    >
</form>
