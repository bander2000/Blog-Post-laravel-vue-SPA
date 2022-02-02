<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                

                <div class="card card-default" style="margin-top:200px">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control" v-model="form.name" required
                                           autofocus autocomplete="off">
                                            <small >{{ error_name }} </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="form.email" required
                                           autofocus autocomplete="off">
                                           <small >{{ error_email }} </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="form.password"
                                           required autocomplete="off">
                                           <small >{{ error_password }} </small>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" @click.prevent="saveForm" >
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password:'',
            },
            error_name : "",
             error_email : "",
            error_password : "",
        }
    },
    methods:{
        saveForm(){
            axios.post('/api/register', this.form).then(() =>{
                this.$router.push({ name: "login"}); 
            }).catch((error) =>{
                 this.error_password = error.response.data.error.password
                 this.error_email = error.response.data.error.email
                 this.error_name = error.response.data.error.name
            })
        }
    }
}
</script>

<style scoped>
.form-group 
{
margin-bottom: 30px;
}
</style>