import React, {useState} from 'react';

const SearchBar = ({onFormSubmit}) =>{
    const [term, setterm] = useState('');
    const onInputChange = (event) =>{
        setterm(event.target.value)
    };

   const onSubmit = event =>
    {
        event.preventDefault();
        onFormSubmit(term)    }


return ( <div className="search-bar ui segment">
            <form onSubmit={onSubmit} className="ui form">
                <div className="field">
                    <label>VideoSearch</label>
                    <input type="text" value={term} onChange={onInputChange} />
                </div>
            </form>
            </div>)}

export default SearchBar;