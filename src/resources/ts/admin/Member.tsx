import React, { useState, useEffect } from 'react'; 
import { Button, Card, TextField } from '@material-ui/core';
import { makeStyles, createStyles } from '@material-ui/core/styles';
import DataTable from '../components/DataTable';
import SearchForm from '../components/SearchForm';
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

function Member() {
    //定義したスタイルを利用するための設定
    const classes = useStyles();  //既存コードなのでこの下に書く
    const [posts, setPosts] = useState([]);

    const getPostsData = async(keyword: string) => {
        await axios
            .get(`/api/members?MemberName=${keyword === undefined ? "" : keyword}`)
            .then(response => {
                setPosts(response.data);
            })
            .catch(() => {
                console.log('通信に失敗しました');
            });
    }

    return (
        <Layout title='会員管理'>
            <Card className={classes.card}>
                <SearchForm onSearch={(keyword: string) => getPostsData(keyword)} /> 
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