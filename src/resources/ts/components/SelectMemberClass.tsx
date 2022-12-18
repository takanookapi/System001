
import React, { useState, useEffect } from 'react'; 
import Box from '@mui/material/Box';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import FormControl from '@mui/material/FormControl';
import Select, { SelectChangeEvent } from '@mui/material/Select';
import axios from 'axios';

type Props = {
    setMemberClass?:any,
    memberClass?:any,
    selectChange?:any,
    name:string
}

export default function BasicSelect(props:Props) {

    const [memberClass, setMemberClass] = useState([]);

    React.useEffect(() => {
        const getMemberClassData = async() => {
            await axios
                .get('/api/memberClasses')
                .then(response => {
                    setMemberClass(response.data);
                })
                .catch(() => {
                    console.log('通信に失敗しました');
                });
            }
            getMemberClassData();
        }, []);
    const handleChange = (event: SelectChangeEvent) => {
        if(props.selectChange) {
            props.selectChange(event);
        };
        // setMemberStatus(event.target.value as string);
    };
    return (
        <Box sx={{ minWidth: 120 }}>
        <FormControl fullWidth>
            <InputLabel id="demo-simple-select-label">権限</InputLabel>
            <Select
                name="MemberClassID"
                id="MemberClassID"
                label="Bucket"
                defaultValue={''}
                onChange={handleChange}
            >
            {
                memberClass.map(
                    (memberClass: any) => (
                        <MenuItem key={memberClass.MemberClassID} value={memberClass.MemberClassID}>{memberClass.Caption}</MenuItem>
                    )
                )
            }
            </Select>
        </FormControl>
        </Box>
    );
}