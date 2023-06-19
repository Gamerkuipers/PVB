<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-secondary uppercase tracking-widest hover:bg-secondary hover:text-primary focus:bg-secondary focus:text-primary focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150                                  ']) }}>
    {{ $slot }}
</button>
