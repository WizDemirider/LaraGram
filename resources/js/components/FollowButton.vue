<template>
    <div>
        <button class="btn btn-primary mb-1" @click="followButtonClick" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            };
        },

        methods: {
            followButtonClick() {
                if(this.status == 'unauthorized')
                {
                    window.location = '/login';
                }
                else
                {
                    axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                    })
                    .catch(errors => {
                        if(errors.response.status == 401) {
                            window.location = '/login';
                        }
                    })
                }
            }
        },

        computed: {
            buttonText() {
                if(this.status == 'unauthorized')
                {
                    return 'Login Now to Follow';
                }
                else
                {
                    return (this.status) ? 'unfollow' : 'follow';
                }
            }
        }
    }
</script>
