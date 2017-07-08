<template>
    <div>
        <h3>Fill in the details to create an institution</h3>

        <form v-if="!loggedin">
            <label>Name:</label>
            <input type="text" v-model="name" required/>
            <br>

            <label>Status:</label>
            <input type="text" required v-model="status"/>
            <br>

            <label>Contacted:</label>
            <input type="text" required v-model="contacted"/>
            <br>

            <label>Contact person</label>
            <textarea v-model="contact_person"> </textarea>

            <br>
            <button v-on:click.prevent="post">Create Institution</button>
        </form>

    </div>
</template>

<script>
    module.exports = {
        data: function(){
            return{
                name: "",
                status: "",
                contacted: "",
                contact_person:"",
                user: {},

                loggedin: false,

                login1: {
                    email: 'dianneprinsescah@gmail.com',
                    password: 'password'
                }
            }
        },
    }
</script>

<style scoped>
    div{
        font-style: italic;
        font-size: 13px;
        background-color: linen;
        padding: 10px;
    }
    label{
        display: block;
        margin: 10px;
    }
    input[type="text"], textarea{
        display: block;
        padding: 8px;
    }

    h3{
        margin-top: 10px;
    }
    button{
        display: block;
        margin: 20px;
        padding: 8px;
        display: block;
        width: 10%;
    }
</style>