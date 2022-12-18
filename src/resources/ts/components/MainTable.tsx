import React from 'react';
import Table from '@material-ui/core/Table';
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Paper from '@material-ui/core/Paper';
import purple from '@material-ui/core/colors/purple';
import { makeStyles, createStyles } from '@material-ui/core/styles';

type Props = {
    headerList : any
    rows : any
}

const useStyles = makeStyles((theme) => createStyles({
    card: {
        margin: theme.spacing(5),
        padding: theme.spacing(3),
    },
    table: {
        minWidth: 650,
    },
    tableHead: {
        backgroundColor: purple['A100'],
    },
}));

function MainTable(props:Props) {

    //定義したスタイルを利用するための設定
    const classes = useStyles();
    //親コンポーネントからpropsで受け取る
    const {headerList, rows} = props;
    return (
        <TableContainer component={Paper}>
            <Table className={classes.table} aria-label="simple table">
                {/* ヘッダー部分 */}
                <TableHead className={classes.tableHead}>
                    <TableRow>
                        {headerList.map((item:any, index:any) => (
                            <TableCell align="center" key={index}>{item}</TableCell>
                        ))}
                    </TableRow>
                </TableHead>
                {/* ボディ部分 */}
                <TableBody>
                    <div className="drop-area">
                    <h1>画像をドラッグ</h1>
                    </div>
                    {rows.map((row:any, index:any) => (
                        <TableRow key={index}>
                            {Object.keys(row).map(function(key, i) {
                                return(
                                    <TableCell align="center" key={i}>{row[key]}</TableCell>
                                );
                            })}
                        </TableRow>
                    ))}
                </TableBody>
            </Table>
        </TableContainer>
    );
}

export default MainTable;