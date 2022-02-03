<template>
    <header class="flex">
        <h1 class="font-bold text-lg">Inertia testing</h1>
        <Nav />
    </header>


    <slot />
</template>

<script>
  import Nav from "./Nav";

  export default {
      components: { Nav }
  };
</script>
