import { useState, useEffect } from "react";
import youtube from "../apis/youtube";

const useVideos = (defaultSearchTerm) => {
    const [videos, setvideos] = useState([]);

    useEffect(()=>{
        search(defaultSearchTerm);
    },[defaultSearchTerm]);

    const search = async term =>
    {
        const response = await youtube.get('/search',
        {params:{q:term}})
        setvideos(response.data.items);
        // setselectedVideo(response.data.items[0]);
       
    };
    
    return [videos, search];
}

export default useVideos;