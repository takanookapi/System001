import * as React from 'react';
import axios from 'axios';
import { DataGrid } from '@mui/x-data-grid';
import Delete from '../components/Delete';
// import EditDialog from '../components/EditDialog';


const columns = [
  {
    field: 'deleteBtn',
    headerName: '削除',
    sortable: false,
    width: 90,
    disableClickEventBubbling: true,
    renderCell: (params:any) => <Delete rowId={ params.id } />
  },
  {
    field: 'editBtn',
    headerName: '編集',
    sortable: false,
    width: 90,
    disableClickEventBubbling: true,
    // renderCell: (params:any) => <EditDialog variant="contained" color="primary">編集</EditDialog>
  },
  {field: 'MemberID', headerName: 'ID', width: 60},
  {field: 'MemberName', headerName: '名前', width: 120},
  {field: 'Priority', headerName: '優先', width: 100},
  {field: 'MemberStatusCaption', headerName: 'ステータス', width: 100},
  {field: 'MemberClassCaption', headerName: '権限', width: 100},
  {field: 'Created', headerName: '作成日時', width: 200},
  {field: 'Updated', headerName: '更新日時', width: 200},
];

type Props = {
  setPosts:any
  posts:any
}

export default function DataTable(props:Props) {
  const {posts,setPosts} = props;

  React.useEffect(() => {
    const getPostsData = async(search?:string) => {
    await axios
          .get(`/api/members?MemberName=${search === undefined ? "" : search}`)
          .then(response => {
            setPosts(response.data);
        })
          .catch(() => {
              console.log('通信に失敗しました');
          });
  }
  getPostsData()
  }, []);
  return (
    <div style={{ height: 1000, width: '100%' }}>
      <DataGrid
        checkboxSelection={true}
        disableSelectionOnClick={true}
        initialState={{
          sorting: {
            sortModel: [{ field: 'Created', sort: 'desc' }],
          },
        }}
        getRowId={(row) => row.MemberID}
        rows={posts}
        columns={columns}
        disableColumnMenu
        pageSize={100}
        rowsPerPageOptions={[100]}
      />
    </div>
  );
}