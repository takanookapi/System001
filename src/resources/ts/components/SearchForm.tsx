import React, { useState, useEffect } from 'react'; 
import { Button, Card, TextField } from '@material-ui/core';

type SearchFormProps = {
    onSearch: any;
}

const SearchForm = ({onSearch}: SearchFormProps) => {
        
    const changeEnterInputText = (e: any) => {
        const keyword = e.target.value;
        if(e.key === 'Enter') {
            onSearch(keyword);
        }
    }

    return <TextField onKeyDown={changeEnterInputText} />
}

export default SearchForm;