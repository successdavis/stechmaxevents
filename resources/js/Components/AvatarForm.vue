<template>
    <div>
        <span class="inline-block h-24 w-24 rounded-full overflow-hidden bg-gray-100">
            <img :src="avatar" class="is-rounded">
        </span>

        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload name="avatar" class="is-rounded none" @loaded="onLoad"></image-upload>
        </form>
    </div>
</template>

<script>
    import ImageUpload from './ImageUpload.vue';
    export default {
        props: ['user'],

        components: {ImageUpload},

        data() {
            return {
                avatar: this.user.avatar_path
            };
        },

        computed: {
            canUpdate() {
                return true
            }
        },

        methods: {
            onLoad(avatar) {
                this.avatar = avatar.src;

                this.persist(avatar.file);
            },
        persist(avatar) {
                let data = new FormData();

                data.append('avatar', avatar);

                axios.post(`/api/${this.user.id}/avatar`, data)
                    .then(() => flash('Avatar Uploaded! '));
            }
        }
    }

</script>
