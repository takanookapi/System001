
import React, { useState, useEffect } from 'react'; 
import Box from '@mui/material/Box';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import FormControl from '@mui/material/FormControl';
import Select, { SelectChangeEvent } from '@mui/material/Select';
import axios from 'axios';

type Props = {
    setMemberStatus?:any,
    memberStatus?:any,
    selectChange?:any,
    name:string
}

export default function BasicSelect(props:Props) {

    const [memberStatus, setMemberStatus] = useState([]);

    React.useEffect(() => {
        const getMemberStatusData = async() => {
            await axios
                .get('/api/memberStatuses')
                .then(response => {
                    setMemberStatus(response.data);
                })
                .catch(() => {
                    console.log('通信に失敗しました');
                });
            }
            getMemberStatusData();
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
            <InputLabel id="demo-simple-select-label">ステータス</InputLabel>
            <Select
                name="StatusID"
                id="statusID"
                label="Bucket Type"
                defaultValue={''}
                onChange={handleChange}
            >
            {
                memberStatus.map(
                    (memberStatus: any) => (
                        <MenuItem key={memberStatus.StatusID} value={memberStatus.StatusID}>{memberStatus.Caption}</MenuItem>
                    )
                )
            }
            </Select>
        </FormControl>
        </Box>
    );
}