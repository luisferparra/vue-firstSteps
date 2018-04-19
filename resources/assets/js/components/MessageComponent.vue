<template>
    <article class="message is-primary" v-show="isVisible">
                <div class="message-header">
                  <p>{{body}}</p>
                  <button class="delete" aria-label="delete" @click="hideModal"></button>
                </div>
                <div class="message-body">
                  {{body}}
                </div>
              </article>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['title','body'],
        data() {
            return {isVisible: true}
        },
        methods: {
            hideModal() {
                this.isVisible = false;
            }
        }
    }
</script>