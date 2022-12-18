import React, { useState, useEffect } from 'react'; 
import { Button, Card, TextField } from '@material-ui/core';
import { makeStyles, createStyles } from '@material-ui/core/styles';
import DataTable from '../components/DataTable';
import axios from 'axios';
import FormDialog from '../components/FormDialog';
import Layout from '../components/Layout';
import FileUpload from '../components/FileUpload';

//スタイルの定義
const useStyles = makeStyles((theme) => createStyles({
    card: {
        margin: theme.spacing(5),
        padding: theme.spacing(3),
    },
}));

//ヘッダーのコンテンツ用の配列定義
const headerList = ['名前', '更新日時', '編集', '削除'];

function Member() {
    //定義したスタイルを利用するための設定
    const classes = useStyles();  //既存コードなのでこの下に書く
    const [posts, setPosts] = useState([]);
    
    const deletePost = async (post:any) => {
        const fd = new FormData;
        fd.append('MemberID',post.MemberID);
        await axios
            .post('/api/deleteSingle', 
            fd
        )
        .then((res:any) => {
            console.log(res);

            setPosts((prevState) => prevState.filter((value) => value !== 'MemberID'));
        })
        .catch(error => {
            console.log(error);
        });
    }

    const getPostsData = (search:any) => {
        axios
            .get(`/api/members?MemberName=${search === undefined ? "" : search}`)
            .then(response => {
                setPosts(response.data);
            })
            .catch(() => {
                console.log('通信に失敗しました');
            });
    }

    const changeSearch = (e:any) => {
        const value = e.target.value;
        getPostsData(value);
    }

    return (
        <Layout title='会員管理'>
        <Card className={classes.card}>
            <TextField onChange={changeSearch} /> 
            <FormDialog posts={posts} className={classes.card} setPosts={setPosts}></FormDialog>
        </Card>
        <Card className={classes.card}>
            <DataTable setPosts={setPosts} posts={posts}/>
        </Card>
        <FileUpload></FileUpload>
    </Layout>
    );
}

export default Member;