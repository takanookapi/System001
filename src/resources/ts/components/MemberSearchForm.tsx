import React , { KeyboardEvent } from 'react';
import { TextField } from '@material-ui/core';

type SearchFormProps = {
    onSearch: (keyword: string) => void;
}

//SearchFormコンポーネント(検索フォーム)
const MemberSearchForm = ({onSearch}: SearchFormProps) => {
    //実際にキーワードが入力された際に挙動する
    const changeEnterInputText = (e: any) => {
        //変換Enterで検索されないようにする
        if(e.key === 'Enter' && !e.nativeEvent.isComposing) {
            //入力されたキーワード
            // const inputElement = e.target as HTMLInputElement;
            const keyword = e.target.value;
            //検索開始(上位のコンポーネントにキーワードprops渡し)
            onSearch(keyword);
        }
    }
    //ビュー
    return <TextField onKeyDown={changeEnterInputText} />
}

export default MemberSearchForm;