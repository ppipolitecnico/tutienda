<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_M extends CI_Model    
{

    public $variable;

    public function __construct()
    {
        parent::__construct();
         $this->load->database();
    
    }
    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_USUARIO = 'usuario';

    const TABLA_USUARIO_CUENTA='usuario_cuenta';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'cod_usuario';

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $result = $this->db->get()->result();
        if ($result) {
            if ($where  !==NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Inserts new data into database
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insertardatos(Array $data) {

        if ($this->db->insert(self::TABLA_USUARIOD, $data)) 
        {
          return $this->db->insert_id();
        }else 
        {
            return false;
        }
    }

    
   public function insertaruser(Array $data) {

        if ($this->db->insert(self::TABLE_NAME, $data)) 
        {
          return true;
        }else 
        {
            return false;
        }
    }

    public function perfil()
    {
       $this->db->select('nombre');
       $query=$this->db->get('tblperfil');
       if ($query<>'') {
            return $query->result_array();
       } else {
            return FALSE;
       }
    }


    /**
     * Updates selected record in the database
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function updateDatos(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
            $this->db->update(self::TABLA_USUARIOD, $data, $where);
        
        return $this->db->affected_rows();
    }

    public function updateLogin(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
            $this->db->update(self::TABLE_NAME, $data, $where);
        
        return $this->db->affected_rows();
    }

    /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {
        if (!is_array($where)) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }


    public function ValidarUsuario($user,$password){            //  Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
       // $query = $this->db->where('usuario',$user); //  La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
       // $query = $this->db->where('Pass',$password);
       // $query = $this->db->get('tblusuario');
                //  Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)
            $this->db->select('perfil.nombre,usuario.nombres');
            $this->db->from('usuario_cuenta');
            $this->db->join('usuario', 'usuario.id_usuario = usuario_cuenta.id_usuario');
            $this->db->join('perfil','usuario_cuenta.id_perfil = perfil.id_perfil');
            $this->db->where('usuario_cuenta.usuario',$user); //  La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
            $this->db->where('usuario_cuenta.contrasena',$password);
            $this->db->where('usuario.estado','Activo');
            $query = $this->db->get();
             return $query->result();  
    }

    public function ver(){

        $consulta=$this->db->query("SELECT * FROM tblusuario_datos;");
        
        return $consulta->result_array();

    }

    public function tipoUsuario($usuario, $contrasena){
    $this->db->select('nombre');
    $this->db->from('tblusuario');
    $this->db->join('tblperfil', 'tblusuario.cod_perfil = tblperfil.cod_perfil');
    $this->db->where('tblusuario.usuario', $usuario);
    $this->db->where('tblusuario.Pass', $contrasena);
    $this->db->limit(1);
    $query = $this->db->get();
    if($query -> num_rows() == 1)
     {
       return $query->result();
      
      }
     else
          {
       return "no develve";
         }
  }


    public function ValidarNuevoUsuario($user,$correo,$cedula)
    {         //  Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
        $query = $this->db->where('usuario',$user); //  La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
        $query = $this->db->where('correo',$correo);
        $query = $this->db->get(self::TABLE_NAME);
        if ($query<>'') 
        {
            $res=$this->db->where('cedula',$cedula); //  La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
            $res = $this->db->get(self::TABLA_USUARIOD);

            if($res<>'')
            {
                return true;  
            }
            else
            {
                return FALSE;
            }
            
       } else {
            return FALSE;
       }
    //  return $query->row();   //  Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)
    }


   public function insertarusuarioCuenta(Array $data) {

        if ($this->db->insert(self::TABLA_USUARIO_CUENTA, $data)) 
        {
          return true;
        }else 
        {
            return false;
        }
    }

    public function insertarusuario(Array $data) {

            if ($this->db->insert(self::TABLE_USUARIO, $data)) 
            {
              return $this->db->insert_id();
            }else 
            {
                return false;
            }
    }
}
