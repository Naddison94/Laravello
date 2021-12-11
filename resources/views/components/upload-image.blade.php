<!-- Required form plugin -->
<link
    href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css"
    rel="stylesheet"
/>

<label
    class="
    w-64
    flex flex-col
    items-center
    px-4
    py-6
    bg-white
    rounded-md
    shadow-md
    tracking-wide
    uppercase
    border border-blue
    cursor-pointer
    hover:bg-purple-600 hover:text-white
    text-purple-600
    ease-linear
    transition-all
    duration-150
    ">
    <i class="fas fa-cloud-upload-alt fa-3x"></i>
    <span class="mt-2 text-base leading-normal">Select a file</span>
    <input type="file" class="hidden" />
</label>
