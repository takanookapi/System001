import React, { useState, useEffect } from 'react';
import Button from '@mui/material/Button';
import TextField from '@mui/material/TextField';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';
import { makeStyles, createStyles } from '@material-ui/core/styles'; 
import SelectStatus from '../components/SelectStatus';
import SelectMemberClass from '../components/SelectMemberClass';
import axios from 'axios';

type Props = {
  posts?:any,
  setPosts?:any,
  className?:any,
  MemberName?:string,
  MemberClassID?:number,
  StatusID?:number,
  Priority?:number,
  memberStatus?:any,
  memberClass?:any,
  name?:any,
}

type FormData = {
  MemberID?:number,
  MemberName?:string,
  MemberClassID?:number,
  StatusID?:number,
  Priority?:number,
  Created?:any,
  CreatedBy?:any,
  Updated?:any,
  UpdatedBy?:any,
}

const useStyles = makeStyles((theme) => createStyles({
    textArea: {
        marginRight: theme.spacing(0, 2),
    },
}));

export default function FormDialog(props:Props) {
  const classes = useStyles();
  const [open, setOpen] = React.useState(false);
  const [formData, setFormData] = React.useState<FormData>({});
  const {posts, setPosts, memberStatus ,memberClass} = props;

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };

  const inputChange = (e?:any) => {
      const key: keyof FormData = e.target.name;
      const value = e.target.value;
      formData[key] = value;
      setFormData(formData);
  }

  const selectChange = (e?:any) => {
    const key: keyof FormData = e.target.name;
    const value = e.target.value;
    formData[key] = value;
    setFormData(formData);
  }

  const createPost = async() => {
    //空だと弾く
    if (Object.keys(formData).length < 1) {
        return;
    }
    // 入力値を投げる
    await axios
        .post('api/member/create', {
            MemberName:     formData.MemberName,
            MemberClassID:  formData.MemberClassID,
            StatusID:       formData.StatusID,
            Priority:       formData.Priority,
        })
        .then(response => {
            if(posts) {

              setPosts([response.data[0], ...posts]);
        }

        })
        handleClose();
    }

    return (
      <div>
        <Button variant="outlined" onClick={handleClickOpen}>
          新規追加
        </Button>
        <Dialog open={open} onClose={handleClose}>
          <DialogTitle>新規追加</DialogTitle>
          <DialogContent>
            <DialogContentText>
            </DialogContentText>
              <TextField id="MemberName" label="名前" variant="outlined" className={classes.textArea} name="MemberName" value={props.MemberName} onChange={inputChange}/>
              <TextField id="Priority" label="優先順位" variant="outlined" className={classes.textArea} name="Priority" value={props.Priority} onChange={inputChange}/>
              <SelectStatus name="StatusID" memberStatus={memberStatus} selectChange={selectChange}/>
              <SelectMemberClass name="MemberClassID" memberClass={memberClass} selectChange={selectChange}/>
          </DialogContent>
          <DialogActions>
            <Button onClick={handleClose}>キャンセル</Button>
            <Button onClick={createPost}>登録</Button>
          </DialogActions>
        </Dialog>
      </div>
    );
}