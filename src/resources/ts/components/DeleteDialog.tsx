import React, { useState } from 'react';
import { Button, Dialog, DialogActions, DialogContent, DialogContentText, DialogTitle } from '@material-ui/core';
import axios from 'axios';

// type Props = {
//   posts?:any,
//   setPosts?:any,
//   className?:any,
//   MemberName?:string,
//   MemberClassID?:number,
//   StatusID?:number,
//   Priority?:number,
//   memberStatus?:any,
//   memberClass?:any,
//   name?:any,
// }

// type DeleteData = {
//   MemberID?:number,
//   MemberName?:string,
//   MemberClassID?:number,
//   StatusID?:number,
//   Priority?:number,
//   Created?:any,
//   CreatedBy?:any,
//   Updated?:any,
//   UpdatedBy?:any,
// }

// const deletePost = async (post:any) => {
//   const fd = new FormData;
//   fd.append('MemberID',post.MemberID);
//   await axios
//       .post('/api/deleteSingle', 
//       fd
//   )
//   .then((res:any) => {
//       console.log(res);

//       setPosts((prevState) => prevState.filter((value) => value !== 'MemberID'));
//   })
//   .catch(error => {
//       console.log(error);
//   });
// }

const DeleteDialog = (MemberID:any) => {
    const [open, setOpen] = useState(false); // 確認ダイアログの表示/非表示
    // const [posts, setPosts] = useState([]);
  //   const [deleteData, deleteFormData] = React.useState<DeleteData>({
  // });
  // const {posts, setPosts} = props;

  const handleOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };

  const deletePost = async (MemberID:any, e:any) => {
    await axios
        .post('/api/member/delete' , {
          MemberID:     MemberID
        })
    .then((res:any) => {
        console.log(res);
        // setPosts((nextState) => nextState.filter((value) => value !== 'MemberID'));
    })
    .catch(error => {
        console.log(error);
    });
  };

  return (
    <div>
      <Button variant="outlined" color="primary" onClick={handleOpen}>
        削除
      </Button>
      <Dialog
        open={open}
        onClose={handleClose}
        aria-labelledby="alert-dialog-title"
        aria-describedby="alert-dialog-description"
      >
        <DialogTitle id="alert-dialog-title">{'確認'}</DialogTitle>
        <DialogContent>
          <DialogContentText id="alert-dialog-description">ID「{MemberID}」を本当に削除しますか？</DialogContentText>
        </DialogContent>
        <DialogActions>
          <Button onClick={handleClose} variant="outlined" color="primary" autoFocus>
            やめる
          </Button>
          <Button onClick={(e) => deletePost(MemberID, e)} color="primary">
            削除する
          </Button>
        </DialogActions>
      </Dialog>
    </div>
  );
};
export default DeleteDialog;