<template>

<div>
          <!-- ***** Preloader Start ***** -->
    <div id="preloader"  v-if="isLoading">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <div class="container">
     <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-top:150px">
              <div class="card-header">
                <h5 class="title">Edit Blog</h5>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data" @submit.prevent="updateBlog">

                  <div class="row mb-5">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label class="mb-1">Blog Title</label>
                        <input type="text" class="form-control" placeholder="Title" v-model="form.title" required>
                      </div>
                    </div>
                  </div>
                
                  <div class="row mb-5">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label class="mb-1">Catogry</label>
                    <select class="form-control" v-model="form.catogry_id" required>
                    <option v-for="catogry in catogries" :key="catogry.id" 
                    :value="catogry.id"
                    :selected="catogry.id == form.catogry_id"
                    >{{ catogry.name }}</option>
                </select>                     
                 </div>
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label class="mb-1">Image</label>
                        <input type="file" class="form-control" 
                        placeholder="image" @change="onChange" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="mb-1">About Me</label>
                        <textarea rows="4" cols="80" class="form-control" 
                        placeholder="Here can be your description" 
                        v-model="form.content"></textarea>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-success mt-3" type="submit">
                      Edit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
</template>

<script>

export default {
    data() {
        return {
            form : {
                 title:'',
                 content:'',
                 catogry_id:'',
                 image:''
            },
            catogries:null,
            isLoading:false,
            
        }
    },
    created() {
        this.isLoading = true
        axios.get(`/api/blog/${this.$route.params.id}/edit`).then((result) => {
            this.form.title = result.data.data.blog.title
            this.form.content = result.data.data.blog.content
            this.form.catogry_id = result.data.data.blog.catogry_id
            this.catogries = result.data.data.catogries
            this.isLoading = false
        }).catch((err) => {
            
        });
    },
    methods : {
      // update blog method
        updateBlog() {

            const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

              axios.put(`/api/blog/${this.$route.params.id}`,this.form,config)
              .then((result) => {
             this.$router.push({ name: "dashboard"}); 
        })
        .catch((err) => {
            
        });
        }
        // end update blog method
        ,
        // on change method for upload image
          onChange(e) {
                this.form.image = e.target.files[0];
            }
        // end on change method for upload image
    }
}
</script>
