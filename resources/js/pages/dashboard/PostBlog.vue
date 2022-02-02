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
                <h5 class="title">Add Blog</h5>
              </div>
              <div class="card-body">
                <form  @submit.prevent="addBlog" enctype="multipart/form-data">

                  <div class="row mb-5">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label class="mb-1">Blog Title</label>
                        <input type="text" class="form-control" placeholder="Title" v-model="form.title" required>
                      </div>
                    </div>
                  </div>
                
                  <div class="row mb-5">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label class="mb-1">Catogry</label>
                    <select class="form-control" v-model="form.catogry_id" required>
                      <option value="" >select</option>
                    <option v-for="catogry in catogries" :key="catogry.id" 
                    :value="catogry.id"
                    >{{ catogry.name }}</option>
                </select>                     
                 </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label class="mb-1">Image</label>
                        <input type="file" class="form-control" @change="onChange" required
                        placeholder="image"  />
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
                      Add
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
      axios.get(`/api/catogries`).then((result) => {
        this.catogries = result.data
        this.isLoading = false
      }).catch((err) => {
        
      });
    },
    methods : {
      addBlog() {

         let formData = new FormData();

    formData.append("title", this.form.title);
    formData.append("content", this.form.content);
    formData.append("catogry_id", this.form.catogry_id);
    formData.append("image", this.form.image);

       const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }


        axios.post(`/api/blog`,formData,this.config).then((result) => {
        this.$router.push({ name: "dashboard"}); 
        }).catch((err) => {
          
        });
      },
       onChange(e) {
                this.form.image = e.target.files[0];
            }
    }
}
</script>
