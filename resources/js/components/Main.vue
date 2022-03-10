<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" v-for="(post, index) in cards.posts" :key="index">
                <div class="card">
                    <img :src="'/storage/'+post.image" class="card-img-top" :alt="post.title">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text"> {{ post.content }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
    import Axios from "axios";
    export default {
        name: "Main",
        data() {
            return {
                posts: [],
            }
        },
        created() {
            Axios.get('http://127.0.0.1:8000/api/posts').then(
                (result) => {
                    this.posts = result.data.results.posts;
                }
            )
        },
    }
</script>

<style lang="scss" scoped>

</style>