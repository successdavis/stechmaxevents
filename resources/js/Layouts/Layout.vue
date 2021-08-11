<template>
  <main>
    <header>
      <navbar></navbar>
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import navbar from '@/Components/Navbar.vue'
export default {
  components: {
    Link,
    navbar,
  }
}
</script>