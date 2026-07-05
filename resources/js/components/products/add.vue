<template>
    <div>
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <vs-input
                  type="text"
                  size="default"
                  placeholder="Tên sản phẩm"
                  class="w-100"
                  v-model="objData.name"
                />
              </div>
              <div class="form-group">
                <label>Nội dung</label>
                <TinyMce
                  v-model="objData.content[0].content"
                />
                <el-button size="small" @click="showSettingLangExist('content')">Đa ngôn ngữ</el-button>
                 <div class="dropLanguage" v-if="showLang.content == true">
                    <div class="form-group" v-for="item,index in lang" :key="index">
                        <label v-if="index != 0">{{item.name}}</label>
                        <TinyMce v-if="index != 0" v-model="objData.content[index].content" />
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label>Mô tả ngắn</label>
                <vs-textarea v-model="objData.description[0].content" />
                <el-button size="small" @click="showSettingLangExist('description')">Đa ngôn ngữ</el-button>
                 <div class="dropLanguage" v-if="showLang.description == true">
                    <div class="form-group" v-for="item,index in lang" :key="index">
                        <label v-if="index != 0">{{item.name}}</label>
                        <vs-textarea v-if="index != 0" v-model="objData.description[index].content" />
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <ImageMulti v-model="objData.images" :title="'san-pham'"/> 
              </div>
              
              <div class="form-group">
                <label>Thêm biến thể (Bạn có thể thêm biến thể nếu sản phẩm này có nhiều lựa chọn như kích cỡ hoặc màu sắc. )</label>
                <vs-switch v-model="variantstatus">
                  <span slot="on">On</span>
                  <span slot="off">Off</span>
                </vs-switch>
              </div>
              <div class="variant" v-if="variantstatus == true" style="background: #f6f6fb; padding: 7px;">
                <div class="form-group" >
                  <vs-select
                    autocomplete
                    class="selectExample"
                    label="Thuộc tính sản phẩm"
                    v-model="variant_item"
                    @change="choiseVariant($event)"
                    >
                    <vs-select-item text="--Chọn--"/>
                    <vs-select-item :key="index" :value="item" :text="item.name" v-for="(item,index) in variant"/>
                  </vs-select>
                </div>
                <div class="viarant" v-if="objData.status_variant == 1 && variant_value.length > 0">
                    <div class="" v-for="item, index in variant_value" :key="index">
                      <label for="" class="label2">{{item.name}}</label>
                      <ul class="centerx">
                        <li v-for="itemval, key in item.value" :key="key">
                          <vs-checkbox :vs-value="itemval.name" @change="getValuebuildSkua(itemval.name,item.name)" >{{itemval.name}}</vs-checkbox>
                        </li>
                      </ul>
                    </div>
                    <div>
                      <vs-table :data="objData.lungtung">
                        <template slot="thead">
                          <vs-th>
                            Phiên bản
                          </vs-th>
                          <vs-th>
                            Giá
                          </vs-th>
                          <vs-th>
                            Số lượng
                          </vs-th>
                        </template>

                        <template slot-scope="{data}">
                          <vs-tr :key="indextr" v-for="(tr, indextr) in objData.lungtung" >
                            <vs-td>
                              {{data[indextr].version}}
                            </vs-td>

                            <vs-td>
                              <vs-input
                                type="text"
                                size="default"
                                class="w-100"
                                v-model="data[indextr].price"
                              />
                            </vs-td>
                            <vs-td >
                              <vs-input
                                type="text"
                                size="default"
                                class="w-100"
                                v-model="data[indextr].qty"
                              />
                            </vs-td>
                          </vs-tr>
                        </template>
                      </vs-table>
                    </div>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-6">
                <label>Giá Sản phẩm</label>
                <vs-input
                  type="number"
                  size="default"
                  icon="all_inclusive"
                  class="w-100"
                  v-model="objData.price"
                />
              </div>
              <div class="form-group col-6" v-if="variantstatus == false">
                <label>Giá bán ra</label>
                <vs-input
                  type="number"
                  size="default"
                  icon="all_inclusive"
                  class="w-100"
                  v-model="objData.discount"
                />
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Trạng thái</label>
                <vs-select v-model="objData.status">
                  <vs-select-item value="1" text="Còn hàng" />
                  <vs-select-item value="0" text="Hết hàng" />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <vs-select
                  class="selectExample"
                  v-model="objData.category"
                  placeholder="Danh mục"
                  @change="findCategoryType()"
                >
                <vs-select-item
                    value="0"
                    text="Không danh mục"
                  />
                  <vs-select-item
                    :value="item.id"
                    :text="JSON.parse(item.name)[0].content"
                    v-for="(item, index) in cate"
                    :key="'f' + index"
                  />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Danh mục cấp 1</label>
                <vs-select
                  class="selectExample"
                  v-model="objData.type_cate"
                  placeholder="Loại"
                  :disabled=" type_cate.length == 0"
                  @change="findCategoryTypeTwo()"
                >
                  <vs-select-item
                    :value="item.id"
                    :text="JSON.parse(item.name)[0].content"
                    v-for="(item, index) in type_cate"
                    :key="'v' + index"
                  />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Danh mục cấp 2</label>
                <vs-select
                  class="selectExample"
                  v-model="objData.type_two"
                  placeholder="Loại"
                  :disabled=" type_two.length == 0"
                >
                  <vs-select-item
                    :value="item.id"
                    :text="JSON.parse(item.name)[0].content"
                    v-for="(item, index) in type_two"
                    :key="'v' + index"
                  />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Thẻ tags cho sản phẩm</label>
                <vs-select
                    multiple
                    class="selectExample"
                    v-model="objData.tags"
                    placeholder="--Chọn--"
                    >
                    <div :key="index" v-for="item,index in tags">
                      <vs-select-group :title="item.name" v-if="item.tags">
                        <vs-select-item :key="index" :value="i.slug+'-'+item.slug" :text="i.name" v-for="i,index in item.tags"/>
                      </vs-select-group>
                    </div>
                </vs-select>
              </div>
              <div class="form-group">
                <label>Thông tin khuyến mãi</label>
                <div v-for="(item, i) in objData.preserve" :key="i">
                  <div class="row">
                    <div class="col-11">
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Khuyến mãi ' + i"
                        class="w-100"
                        v-model="objData.preserve[i].detail"
                      />
                      <br />
                    </div>
                    <div class="col-1">
                      <a
                        href="javascript:;"
                        v-if="i != 0"
                        @click="remoteAr(i,'preserve')"
                      >
                        <img v-bind:src="'/media/' + joke.avatar" width="25" />
                      </a>
                    </div>
                  </div>
                </div>

                <el-button size="small" @click="addInput('preserve')"
                  >Thêm khuyến mãi</el-button
                >
              </div>
              <div class="form-group">
                <label>Thông số kỹ thuật</label>
                <div v-for="(item, index) in objData.size" :key="index">
                  <div class="row">
                    <div class="col-11">
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Tiêu đề ' + index"
                        class="w-100"
                        v-model="objData.size[index].title"
                      />
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Chi tiết ' + index"
                        class="w-100"
                        v-model="objData.size[index].detail"
                      />
                      <br />
                    </div>
                    <div class="col-1">
                      <a
                        href="javascript:;"
                        v-if="index != 0"
                        @click="remoteAr(index,'size')"
                      >
                        <img v-bind:src="'/media/' + joke.avatar" width="25" />
                      </a>
                    </div>
                  </div>
                </div>

                <el-button size="small" @click="addInput('size')"
                  >Thêm thông số</el-button
                >
              </div>
              <div class="form-group">
                <label>Sản phẩm nổi bật</label>
                <vs-select v-model="objData.discountStatus">
                  <vs-select-item value="1" text="Có" />
                  <vs-select-item value="0" text="Không" />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Hiển thị trang chủ</label>
                <vs-select v-model="objData.home_status">
                  <vs-select-item value="1" text="Có" />
                  <vs-select-item value="0" text="Không" />
                </vs-select>
              </div>
            </div>
          </div> 
        </div>
      </div>
      <div class="row fixxed">
        <div class="col-12">
          <div class="saveButton">
            <vs-button color="primary" @click="saveProducts"
              >Thêm mới</vs-button
            >
          </div>
        </div>
      </div>
    </div>
</template>


<script>
import { mapActions } from "vuex";
import TinyMce from "../_common/tinymce";
import ImageMulti from "../_common/upload_image_multi";
import "tinymce/icons/default/icons.min.js";
import InputTag from "vue-input-tag";
import InputColorPicker from "vue-native-color-picker";
export default {
  name: "product",
  data() {
    return {
      cate: [],
      joke: {
        avatar: "delete-sign--v2.png",
      },
      type_cate: [],
      tags: [],
      checkBox1:{
        roleid:[]
      },
      linhtinh:[],
      
      type_two:[],
      showLang: {
        title: false,
        content: false,
        description: false,
      },
      variant_value:[],
      variant:[],
      variant_item:{},
      variantstatus:false,
      lang: [],
      errors: [],
      cateservice:[],
      cate_build_pc:[
        {
          name: 'Vi xử lý',
          value:'cpu'
        },
        {
          name: 'Bo mạch chủ',
          value:'mainboard'
        },
        {
          name: 'Ram',
          value:'ram'
        },
        {
          name: 'Ổ Cứng',
          value:'o-cung'
        },
        {
          name: 'VGA',
          value:'vga'
        },
        {
          name: 'Nguồn',
          value:'nguon'
        },
        {
          name: 'Vỏ Case',
          value:'case'
        },
        {
          name: 'Tản nhiệt',
          value:'tan-nhiet'
        },
        {
          name: 'Màn hình',
          value:'man-hinh'
        },
        {
          name: 'Bàn phím',
          value:'ban-phim'
        },
        {
          name: 'Chuột',
          value:'chuot'
        },
        {
          name: 'Tai nghe',
          value:'tai-nghe'
        },
        {
          name: 'Loa máy tính',
          value:'loa-may-tinh'
        }
      ],
      objData: {
        lang: "",
        variant:[],
        name: "",
        size: [
          {
            title: "",
            detail: ""
          },
        ],
        cate_build_pc:"",
        tags:[],
        price: 0,
        discount: 0,
        preserve:[
          {
            detail: ""
        }
        ],
        ingredient:'',
        images: [],
        qty: "",
        description: [
          {
            lang_code: "vi",
            content: "",
          },
        ],
        content: [
          {
            lang_code: "vi",
            content: "",
          },
        ],
        category: 0,
        status: 1,
        discountStatus:0,
        type_cate: 0,
        type_two:0,
        species:[
          {
            detail: ""
        }
        ],
        origin: "",
        thickness: "",
        hang_muc: "",
        service_id:0,
        lungtung:[],
        status_variant: 0,
        home_status: 0
      },
    };
  },
  components: {
    TinyMce,
    ImageMulti,
    InputTag,
    "v-input-colorpicker": InputColorPicker
  },
  computed: {},
  watch: {
  },
  methods: {
    ...mapActions([
      "editId",
      "saveProduct",
      "listCate",
      "loadings",
      "listLanguage",
      "findTypeCate",
      "findTypeCateTwo",
      "listCateService",
      "listVariant",
      "listVariantValue",
      "findTags"
    ]),
    getValuebuildSkua(variant_value, variant){
      if(this.linhtinh.length == 0){
        this.linhtinh.push(this.getValuebuildSku(variant_value, variant));
      }else{
        this.linhtinh.forEach((element, key) => { 
          if(this.linhtinh.some(data => data.display_name === variant)){
            console.log(1);
            // console.log(variant_value, element.display_name)
            if(!element.option_values.some(data => data.label === variant_value) && this.linhtinh[key].display_name == variant){
              var obj = {};
              obj.label = variant_value;
              obj._id = 13
              this.linhtinh[key].option_values.push(obj);
            }else if(element.option_values.some(data => data.label === variant_value)){
              const idxObj = this.linhtinh[key].option_values.findIndex(obj => {
                return obj.label === variant_value;
              });
              this.linhtinh[key].option_values.splice(idxObj, 1);
            }
          }else{
            this.linhtinh.push(this.getValuebuildSku(variant_value, variant));
          }
        });
      }
      this.objData.variant = this.linhtinh;
      let sets = [[]];
      const id_obj = {};
      this.linhtinh.forEach(option => {
        const new_sets = [];
        option.option_values.forEach(({ label, _id }) => {
          new_sets.push(Array.from(sets, set => [...set, label]));
          id_obj[label] = { id: option._id, value_id: _id };
        });
        sets = new_sets.flatMap(set => set);
      });

      this.objData.lungtung =  sets.map(set => ({
        price: 0,
        qty:0, 
        version: set.join("-"),
        sku: "",
        option_values: set.map(label => ({ option_id: id_obj[label].value_id, id: id_obj[label].id }))
      }));

    },
    getValuebuildSku(variant_value, variant){
      var arr = [];
      var objOtion = {
        option_values:[]
      };
      objOtion.display_name = variant;
        var obj = {};
        obj._id = 12;
        obj.label = variant_value;
        objOtion.option_values.push(obj);
        
      return objOtion;
    },
    choiseVariant(event){
      
      this.objData.status_variant = 1;
      this.listVariantValue({id:event.id}).then(response => {
        if (this.variant_value.length == 0) {
          var obj = {};
          obj.name = event.name;
          obj.value = response.data;
          this.variant_value.push(obj);
        }else if(!this.variant_value.some(data => data.name === event.name)){
          var obj = {};
          obj.name = event.name;
          obj.value = response.data;
          this.variant_value.push(obj);
        }
      }).catch(error => {

      })
    },
    saveProducts() {
      this.errors = [];
     if(this.objData.name == '') this.errors.push('Tên không được để trống');
      if(this.objData.content[0].content == '') this.errors.push('Nội dung không được để trống');
      if(this.objData.description[0].content == '') this.errors.push('Mô tả không được để trống');
      if(this.objData.images.length == 0) this.errors.push('Vui lòng chọn ảnh');
      if(this.objData.category == 0) this.errors.push('Chọn danh mục sản phẩm');
      if(this.objData.service_id == null) this.errors.push('Chọn danh mục dịch vụ');
      if (this.errors.length > 0) {
        this.errors.forEach((value, key) => {
          this.$error(value);
        });
        return;
      } else {
        this.loadings(true);

        this.saveProduct(this.objData)
          .then((response) => {
            this.loadings(false);
            this.$router.push({ name: "listProduct" });
            this.$success("Thêm sản phẩm thành công");
            this.$route.push({ name: "listProduct" });
          })
          .catch((error) => {
            this.loadings(false);
            // this.$vs.notify({
            //   title: "Thất bại",
            //   text: "Thất bại",
            //   color: "danger",
            //   position: "top-right"
            // });
          });
      }
    },
    
    findCategoryType() {
      this.findTypeCate(this.objData.category).then((response) => {
        this.type_cate = response.data;
      });
      this.findTags(this.objData.category).then((response) => {
        this.tags = response.data;
      });
    },
    listVariants(){
      this.listVariant().then(response => {
        this.variant = response.data
      }).catch(error => {

      })
    },
    findCategoryTypeTwo() {
      this.findTypeCateTwo(this.objData.type_cate).then((response) => {
        this.type_two = response.data;
      });
    },
    remoteAr(index,key) {
      if(key == 'size'){
        this.objData.size.splice(index, 1);
      }
      if(key == 'preserve'){
        this.objData.preserve.splice(index, 1);
      }
        if(key == 'species'){
        this.objData.species.splice(index, 1);
      }
    },
    addInput(key) {
        var oj = {};
        if(key =='size'){
          oj.title = "";
          oj.detail = "";
          this.objData.size.push(oj);
        }
        if(key =='preserve'){
          oj.detail = "";
          this.objData.preserve.push(oj);
        }
        if(key =='species'){
          oj.detail = "";
          this.objData.species.push(oj);
        }
    },
    showSettingLangExist(value, name = "content") {
      if (value == "content") {
        this.showLang.content = !this.showLang.content;
        this.lang.forEach((value, index) => {
          if (
            !this.objData.content[index] &&
            value.code != this.objData.content[0].lang_code
          ) {
            var oj = {};
            oj.lang_code = value.code;
            oj.content = "";
            this.objData.content.push(oj);
          }
        });
      }
      if (value == "description") {
        this.showLang.description = !this.showLang.description;
        this.lang.forEach((value, index) => {
          if (
            !this.objData.description[index] &&
            value.code != this.objData.description[0].lang_code
          ) {
            var oj = {};
            oj.lang_code = value.code;
            oj.content = "";
            this.objData.description.push(oj);
          }
        });
      }
    },
    listLang() {
      this.listLanguage()
        .then((response) => {
          this.loadings(false);
          this.lang = response.data;
        })
        .catch((error) => {});
    },
  },
  mounted() {
    this.loadings(true);
    this.listCate().then((response) => {
      this.loadings(false);
      this.cate = response.data;
    });
     this.listCateService().then((response) => {
      this.loadings(false);
      this.cateservice = response.data;
    });
    this.listVariants();
    this.listLang();
  },
};
</script>
<style scoped>
.centerx li {
    list-style: none!important;
}
.centerx, .con-notifications, .con-notifications-position {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
</style>