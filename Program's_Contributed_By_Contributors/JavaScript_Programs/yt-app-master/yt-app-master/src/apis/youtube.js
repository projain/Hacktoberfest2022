import axios from 'axios';

const KEY ='AIzaSyCmt820qkQbt3jOzaqynORfFQ7_6vObLPo'

export default axios.create({
    baseURL: 'https://www.googleapis.com/youtube/v3',
    params: {
        part: 'snippet',
        type: 'video',
        maxResults: 5,
        key: KEY
    }
});