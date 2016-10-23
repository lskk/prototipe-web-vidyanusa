package 
{
import flash.events.EventDispatcher;

public class User extends EventDispatcher
{
    //---------------------------------------
    // PRIVATE & PROTECTED INSTANCE VARIABLES
    //---------------------------------------

    private static var _instance:User;

    //---------------------------------------
    // PUBLIC VARIABLES
    //---------------------------------------

    public var theUser:String = "";

    //---------------------------------------
    // PUBLIC METHODS
    //---------------------------------------

    public static function get instance():User
    {   
        return initialize();
    }

    public static function initialize():User
    {
        if (_instance == null)
        {
            _instance = new User();
        }
        return _instance;
    }

    //---------------------------------------
    // CONSTRUCTOR
    //---------------------------------------

    public function User()
    {
        super();
        if (_instance != null)
        {
            throw new Error("Error:User already initialised.");
        }
        if (_instance == null)
        {
            _instance = this;
        }
    }

}
}