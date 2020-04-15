import axios from "axios";

export default {
  create(title, content, img) {
    return axios.post("/api/posts/dashboard/create", {
      title: title,
      content: content,
      img: img,
      
    }
    
    );
  },
  findAll() {
    return axios.get("/api/posts");
  }
};