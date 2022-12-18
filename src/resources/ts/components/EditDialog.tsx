// import React, { useState, useEffect } from 'react';
// import { Card } from '@material-ui/core';
// import { makeStyles, createStyles } from '@material-ui/core/styles';
// import FormDialog from '../components/FormDialog';
// import axios from 'axios';

// const useStyles = makeStyles((theme) => createStyles({
//     card: {
//         margin: theme.spacing(5),
//         padding: theme.spacing(3),
//     },
// }));

// type editData = {
//     MemberName?:string,
//     MemberClassID?:number,
//     StatusID?:number,
//     Priority?:number,
//     Created?:any,
//     CreatedBy?:any,
//     MemberID?:any,
//     Updated?:any,
//     UpdatedBy?:any,
// }

// function EditDialog(props) {
//     const classes = useStyles();

//     const params = props.match.params;

//     const [editData, setEditData] = useState<editData>({});


//     useEffect(() => {
//         getEditData();
//     }, [])

//     const getEditData = async() => {
//         await axios
//             .post('/api/edit', {
//                 MemberID: params.MemberID
//             })
//             .then(res => {
//                 setEditData(res.data);
//             })
//             .catch(() => {
//                 console.log('通信に失敗しました');
//             });
//     }

//     const updatePost = async() => {
//         if(editData == ''){
//             return;
//         }
//         //入力値を投げる
//         await axios
//             .post('/api/update', {
//                 MemberID: params.id,
//                 MemberName: editData.MemberName,
//             })
//             .then((res) => {
//                 setEditData(res.data);
//             })
//             .catch(error => {
//                 console.log(error);
//             });
//     }

//     function inputChange(e){
//         const key = e.target.name;
//         const value = e.target.value;
//         editData[key] = value;
//         let data = Object.assign({}, editData);
//         setEditData(data);
//     }

//     return (
//         <div className="container">
//             <div className="row justify-content-center">
//                 <div className="col-md-8">
//                     <div className="card">
//                         <h1>タスク編集</h1>
//                         <Card className={classes.card}>
//                             <FormDialog editData={editData}  inputChange={inputChange} btnFunc={updatePost}　/>
//                         </Card>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     );
// }

// export default EditDialog;