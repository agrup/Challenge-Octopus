<template>
    <div>
        <button  type="submit" class="btn btn-primary btn-group" v-on:click="liked">Like</button>
        <span class="btn rounded-pill border-danger">{{like.likesvalue}}</span>
    </div>
</template>

    <script>

        export default{
            props: [
                'post',
                'likesvalue'
            ],
            mounted(){
                axios.get('/posts/'+this.post+'/like',{})
                .then(response => {
                    this.like = response.data;
                });
                
            },
            methods:{
                liked(){
                    axios.post('/posts/'+this.post+'/like',{})
                    .then(response => {
                        this.like = response.data;
                    });
                }
            },
            data() {
                return {
                    like: null
                }
            },


        }
    </script>
