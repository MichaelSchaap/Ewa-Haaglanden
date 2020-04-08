import axios from "axios";

export default {
  create([title, category, content, img]) {
    return axios.post("/api/posts/", {
      title: title,
      category: category,
      content: content,
      img: img,
      
    });
  },
  findAll() {
    return axios.get("/api/posts");
  }
};