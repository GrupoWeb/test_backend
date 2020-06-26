<template>
      <div>
            <el-container>
                  <el-header>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                              <a class="navbar-brand" href="#">Test Backend Server / Fronted</a>
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                              </button>

                              
                        </nav>
                  </el-header>
                  <el-main>
                              <el-form ref="formShared" :model="formShared" :rules="rulesShared">
                                    <el-row type="flex" class="row-bg" justify="center">
                                          <el-col :span="12">
                                                <el-form-item label="Key:">
                                                      <el-input v-model="formShared.id_auth"></el-input>
                                                </el-form-item>
                                                <el-form-item label="Shared Secret:">
                                                      <el-input v-model="formShared.shared_auth"></el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                      <el-button type="primary" @click="onSubmitAuth('formShared')">Enviar</el-button>
                                                </el-form-item>
                                          </el-col>
                                    </el-row>   
                              </el-form>
                              <transition name="el-zoom-in-center">
                                    <el-row type="flex" class="row-bg" justify="center">
                                          <el-col :span="12">
                                                <div v-show="zoom.zoom_shared">
                                                      <el-alert
                                                      :title="response_data.response_shared"
                                                      :type="type_response.type_data"
                                                      effect="dark"
                                                      :closable="false">
                                                      </el-alert>
                                                </div>
                                          </el-col>
                                    </el-row>
                              </transition>
                              
                              <el-divider></el-divider>

                              <el-form ref="formMessage" :model="formMessage" >
                                    <el-row type="flex" class="row-bg" justify="center">
                                          <el-col :span="12">
                                                <el-form-item label="Message:">
                                                      <el-input v-model="formMessage.msg"></el-input>
                                                </el-form-item>
                                                <el-form-item label="Tags:">
                                                      <el-input v-model="formMessage.tags"></el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                      <el-button type="primary" @click="onSubmitMessage">Enviar</el-button>
                                                </el-form-item>
                                          </el-col>
                                    </el-row>   
                              </el-form>
                              <transition name="el-zoom-in-center">
                                    <el-row type="flex" class="row-bg" justify="center">
                                          <el-col :span="12">
                                                <div v-show="zoom.zoom_message">
                                                      <el-alert
                                                      :title="response_data.response_message"
                                                      :type="type_response.type_data_message"
                                                      effect="dark"
                                                      :closable="false">
                                                      </el-alert>
                                                </div>
                                          </el-col>
                                    </el-row>
                              </transition>

                              <el-divider></el-divider>

                              <el-form ref="formMessageId" :model="formMessageId" >
                                    <el-row type="flex" class="row-bg" justify="center">
                                          <el-col :span="12">
                                                <el-form-item label="Message Id:">
                                                      <el-input v-model="formMessageId.id_messasge"></el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                      <el-button type="primary" @click="onSubmitMessageId">Enviar</el-button>
                                                </el-form-item>
                                          </el-col>
                                    </el-row>   
                              </el-form>
                              
                              <el-row type="flex" class="row-bg" justify="center">
                                    <el-col :span="12">
                                          <div v-show="zoom.zoom_messageId">
                                                <el-table :data="response_data.response_messageId" style="width:100%">
                                                      <el-table-column prop="msg" label="Mensaje"></el-table-column>
                                                      <el-table-column prop="tags" label="Tags"></el-table-column>
                                                </el-table>
                                          </div>
                                    </el-col>
                              </el-row>

                              <el-divider></el-divider>

                              <el-form ref="formMessageTags" :model="formMessageTags" >
                                    <el-row type="flex" class="row-bg" justify="center">
                                          <el-col :span="12">
                                                <el-form-item label="Message Tags:">
                                                      <el-input v-model="formMessageTags.tags"></el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                      <el-button type="primary" @click="onSubmitMessageTags">Enviar</el-button>
                                                </el-form-item>
                                          </el-col>
                                    </el-row>   
                              </el-form>
                              
                              <el-row type="flex" class="row-bg" justify="center">
                                    <el-col :span="12">
                                          <div v-show="zoom.zoom_messageTags">
                                                <el-table :data="response_data.response_messageTags" style="width:100%">
                                                      <el-table-column prop="msg" label="Mensaje"></el-table-column>
                                                      <el-table-column prop="tags" label="Tags"></el-table-column>
                                                </el-table>
                                          </div>
                                    </el-col>
                              </el-row>
                             
                              
                              
                  </el-main>
            </el-container>
      </div>
</template>

<script>
export default {
      data(){
            return {
                  formShared: {
                        id_auth: "",
                        shared_auth: ""
                  },
                  formMessage: {
                        msg: "",
                        tags: ""
                  },
                  formMessageId: {
                        id_messasge: "",
                  },
                  formMessageTags: {
                        tags: "",
                  },
                  url_method: {
                        shared: '/api/credential',
                        message: '/api/message',
                        messagefindId: '/api/message/',
                        messagefindTags: '/api/messages/',
                  },
                  zoom: {
                        zoom_shared:false,
                        zoom_message:false,
                        zoom_messageId:false,
                        zoom_messageTags:false,
                  },
                  response_data: {
                        response_shared:"",
                        response_message:"",
                        response_messageId:[],
                        response_messageTags:[],
                  },
                  type_response:{
                        type_data: "success"
                  },

                  rulesShared: {
                        id_auth: [
                              { required: true, message: 'este campo no puede estar vacio', trigger: 'blur' },
                        ],
                        shared_auth: [
                              { required: true, message: 'este campo no puede estar vacio', trigger: 'blur' },
                        ],
                  }

            }
      },
      methods: {
            onSubmitAuth(formName) {
                  this.$refs[formName].validate((valid) => {
                        if (valid) {
                              axios.put(this.url_method.shared,{
                                    key: this.formShared.id_auth,
                                    shared_secret: this.formShared.shared_auth
                              }).then(response => {
                                    const status = JSON.parse(response.status);
                                    if(status == 204){
                                          this.response_data.response_shared = "Respuesta del servidor de tipo: 204";
                                          this.zoom.zoom_shared = true;
                                          this.type_response.type_data = "warning";
                                    }
                                    
                              }).catch(error => {
                                    this.response_data.response_shared = "Respuesta del servidor de tipo: 403";
                                    this.type_response.type_data = "error";
                                    this.zoom.zoom_shared = true;
                              })
                        }
                  })
            },
            onSubmitMessage() {
                  axios.post(this.url_method.message,{
                        msg:  this.formMessage.msg,
                        tag:  this.formMessage.tags
                  }).then(response => {
                        const status = JSON.parse(response.status);
                        if(status == 200){
                              this.response_data.response_message = "Respuesta del servidor de tipo: " + status + " con el id: " + response.data;
                              this.zoom.zoom_message = true;
                              this.type_response.type_data_message = "success";
                        }
                  }).catch(error => {
                              this.response_data.response_message = "Respuesta del servidor de tipo: " + error;
                              this.zoom.zoom_message = true;
                              this.type_response.type_data_message = "error";
                  })
            },
            onSubmitMessageId() {
                  axios.get(this.url_method.messagefindId  + this.formMessageId.id_messasge)
                        .then(response => {
                              
                              this.response_data.response_messageId = response.data;
                              this.zoom.zoom_messageId = true;
                        })
            },
            onSubmitMessageTags() {
                  axios.get(this.url_method.messagefindTags  + this.formMessageTags.tags)
                        .then(response => {
                              this.response_data.response_messageTags = response.data;
                              this.zoom.zoom_messageTags = true;
                        })
            }
      },
}
</script>

<style>

  .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>