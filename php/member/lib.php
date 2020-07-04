<?
    class SqlQuery {
        protected $dbtable;
        protected $conn;

        public function __construct($dbtable) {
            $this->dbtable = $dbtable;

            $this->conn = mysqli_connect("localhost", "p201987062", "pp201987062", "p201987062");
            if (!$this->conn) {
                die("DB 연결 실패 ===> (".mysqli_connect_errno().") ".mysqli_connect_error());
            }
        }

        public function connectClose() {
            $this->conn->close();
        }
    }

    class Select extends SqlQuery {
        private $sql;
        private $field = "*";
        private $where;
        private $limit;
        private $order;

        public function field($field) {
            $this->field = $field;
        }

        public function where($where = "") {
            $this->where = ($where != "") ? " WHERE ".$where : "";
        }

        public function limit($start = 0, $end = 9999) {
            $this->limit = ($start == 0 && $end == 9999) ? " LIMIT 1" : " LIMIT ".$start.", ".$end;
        }

        public function asc($asc = "") {
            $this->order = ($this->order == "") ? " ORDER BY ".$asc." ASC" : ", ".$asc." ASC";
        }

        public function desc($desc = "") {
            $this->order = ($this->order == "") ? " ORDER BY ".$desc." DESC" : ", ".$desc." DESC";
        }

        public function query() {
            $this->sql = "SELECT ".$this->field." FROM ".$this->dbtable;
            $this->sql .= $this->where;
            $this->sql .= $this->order;
            $this->sql .= $this->limit;

            return $this->conn->query($this->sql);
        }

        public function getCount() {
            $query = $this->query();

            return @mysqli_num_rows($query);
        }

        public function getRow() {
            $query = $this->query();

            return mysqli_fetch_array($query);
        }

        public function getArray() {
            $query = $this->query();

            $result = [];
            while($row = mysqli_fetch_array($query)) { $result[] = $row; }

            return $result;
        }
    }

    class Insert extends SqlQuery {
        private $sql;
        private $field;
        private $val;

        public function field($field) {
            $this->field = "INSERT INTO ".$this->dbtable." ".$field;
        }

        public function value($val) {
            $this->val = " VALUES (".$val.")";
        }

        public function post() {

        }
    }
?>